    <div class="tree_head">
        <h1 style="display: inline;">WoT :: <a href="http://armor.kiev.ua/wot/gamerstat/<?=$def_nick;?>"><?=$def_nick;?></a> (<a href="http://www.noobmeter.com/player/ru/<?=strtolower($def_nick);?>/<?=$def_acc;?>/">Noobmeter</a>, <a href="http://wots.com.ua/user/stats/<?=strtolower($def_nick);?>">WOTS</a>, <a href="https://kttc.ru/wot/ru/user/<?=strtolower($def_nick);?>/">KTTC</a>) — техника игрока в <a href="http://armor.kiev.ua/wot/gamertrees/<?=$def_nick;?>">дереве</a> развития</h1>
        <span onclick="show_counters();" class="pointer green">Показать количество боев</span>
    </div>
    <div class="nationTree" id="ntree-final" style="display: none;">
        <div class="treeWrapper">
            <div class="levelLine" style="left:0px;"></div>
            <div class="levelLine" style="left:324px;"></div>
            <div class="levelLine" style="left:648px;"></div>
            <div class="levelLine" style="left:972px;"></div>
            <div class="levelLine" style="left:1296px;"></div>
            <div id="levels">
                <div>I</div>
                <div>II</div>
                <div>III</div>
                <div>IV</div>
                <div>V</div>
                <div>VI</div>
                <div>VII</div>
                <div>VIII</div>
                <div>IX</div>
                <div>X</div>
            </div>
            <div id="tree">

            </div>
        </div>
    </div>
    <div class="nationTree" id="ntree-current" style="display: none;">
        <div class="treeWrapper">
            <div class="levelLine" style="left:0px;"></div>
            <div class="levelLine" style="left:324px;"></div>
            <div class="levelLine" style="left:648px;"></div>
            <div class="levelLine" style="left:972px;"></div>
            <div class="levelLine" style="left:1296px;"></div>
            <div id="levels">
                <div>I</div>
                <div>II</div>
                <div>III</div>
                <div>IV</div>
                <div>V</div>
                <div>VI</div>
                <div>VII</div>
                <div>VIII</div>
                <div>IX</div>
                <div>X</div>
            </div>
            <div id="tree">

            </div>
        </div>
    </div>