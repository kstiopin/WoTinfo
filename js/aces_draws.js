const base ='http://aces.gg/index.php?ajax=1&do=tournament&act=drawings&drawing_tmpl=drawings_box&drawing_fix_limit=5&drawing_number_on_1_page=5'; // 'http://aces.gg/engine/ajax/tournament.php/?act=drawings&drawing_tmpl=drawings_box&'
const url = base + '&drawing_f_obj_id=8&drawing_f_completed=-1'
//index.php?ajax=1&do=tournament&act=drawings&drawing_act=vote&msg_only=1&drawing=7243&key=7fb8a7ab94cca5fb180828f67849282f
// '&drawing_tmpl=drawings_box&drawing_fix_limit=5&drawing_number_on_1_page=5&drawing_f_obj_type=6&drawing_f_obj_id=8&drawing_f_completed=-1&drawing_r_act=%2Findex.php%3Fdo%3Dstreams%26stream%3D8&drawing=6884&drawings_act=vote&_=1469210167900
if (location.href !== url) {
  location.href = url;
}
var draws = new XMLHttpRequest(); // draws XHR
var draw = ''; // draws response
var question = ''; // draws question
var answer = ''; // draws question answer
var vote = new XMLHttpRequest(); // vote XHR
var login = new XMLHttpRequest(); // login XHR
var time = 300; // 5 min
var n = 1; // vote number
// Get answer
function sphinx(_text) {
  question = _text.substr(_text.indexOf('title="Вопрос:'));
  question = question.substr(question.indexOf('>'));
  question = question.substr(1, question.indexOf('</span>')).replace(':<', '').replace('x', '*').replace('х', '*').trim();
  if (question.indexOf('=') > 0) {
    question = question.substr(0, question.indexOf('=')).trim();
  }
  console.log(`%cQUESTION: ${ question }`, 'color: #8E6EFF');
  if (question.indexOf('стримера') > 0) {
    let chunk = _text.split('fa fa-user')[2].substr(10);
    answer = chunk.substr(0, chunk.indexOf('</div>')).trim();
  } else if ((question.indexOf('+') > 0) || (question.indexOf('-') > 0) || (question.indexOf('*') > 0) || (question.indexOf('/') > 0)) {
    answer = eval(question.replace(/(?!-+\/*)[^0-9.]/g,''));
  } else if (question.indexOf('пальцев') > 0) {
    answer = 5;
  } else if (question.indexOf('неделе') > 0) {
    answer = 7;
  } else if (question.indexOf('часов в сутках') > 0) {
    answer = 24;
  } else if (question.indexOf('Сколько столиц') > 0) {
    answer = 1;
  } else if (question.indexOf('На каком сервере') > 0) {
    answer = 5;
  } else if (question.indexOf('Минимальный уровен') > 0) {
    answer = 1;
  } else if (question.indexOf('Максимальный уровен') > 0) {
    answer = 10;
  }

  return answer;
}
// AFTER GOT DRAWS LIST <<< DRAW LOGIC HERE
draws.onreadystatechange = function() {
  if ((draws.readyState == 4) && (draws.status == 200)) {
    draw = draws.responseText;
    // Check if we need to vote
    if (draw.indexOf('Принять участие') > 0) {
      let answer = sphinx(draw);
      draw = draw.substr(draw.indexOf('ajax-content-action'));
      draw = draw.substr(draw.indexOf('data-url="') + 10);
      draw = draw.substr(0, draw.indexOf('"'));
      draw += `&drawing_act_answer=${ answer }`;
      login.open("POST", 'http://aces.gg', true);
      login.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      login.send('login=submit&login_name=Insomnex&login_password=75662818');
    } else {
      if (draw.indexOf('Подтверждено участие') > 0) {
        console.log('%cdraw in progress', "color: #369");
      } else {
        var winner_index = draw.indexOf('data-original-title="');
        var winners = '';
        while (winner_index > 0) {
          draw = draw.substr(winner_index + 21);
          winners += draw.substr(0, draw.indexOf('"')) + ', ';
          winner_index = draw.indexOf('data-original-title="');
        }
        let won = (winners.substr(0, winners.length - 2).indexOf('Insomnex') > -1);
        console.log(`%cdraw finished: ${ ((won) ? 'won!' : 'not won') }`, `color: #${(won ? 'F79144' : 'D50000')}`);
      }
    }
  }
};
// SEND VOTE AFTER LOGIN REQUEST SENT
login.onreadystatechange = function() {
  if ((login.readyState == 4) && (login.status == 200)) {
    vote.open("GET", draw, true);
    vote.send();
  }
};
// AFTER VOTE REQUEST SENT
vote.onreadystatechange = function() {
  if ((vote.readyState == 4) && (vote.status == 200)) {
    if (vote.responseText.indexOf('Неверный') > 0) {
      console.log(`%cWRONG ANSWER: ${ answer }`, 'color: red');
    } else {
      let draw_id = draw.substr(draw.indexOf('&drawings') - 4, 4)
      console.log(`%c${ ((vote.responseText.indexOf('voted!') > 0) ? 'already ' : '') }voted on draw ${ draw_id }`, "color: #00AA0E");
    }
  }
};
// GET DRAWS LIST
function get_draws() {
  draws.open("GET", base + 'drawing_number_on_1_page=1&drawing_f_completed=-1', true);
  draws.send();
}
// REPEATED DRAWING CALL
function timeout() {
  get_draws();
  var cd = new Date();
  console.log(`run ${ n }`, `started ${ cd.getHours() }:${ cd.getMinutes() }:${ cd.getSeconds() }`, `another try in ${ (time / 60) }m`);
  setTimeout(timeout, time * 1000);
  n++;
}
// START CALL
timeout();