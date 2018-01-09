import React from 'react';

import { colorScales, scaleColors } from '../config/config';

const colorScalesLabels = {
  wn8: 'WN8xvm',
  wg: 'WG rating',
  winrate: 'Winrate %',
  battles: 'Total battles',
  exp: 'Average EXP',
  dmg: 'Average DMG',
};

const renderScale = (scale, rating) => ((rating === 'winrate') ? (scale - 0.01).toFixed(2) : (scale - 1));

const ColorScales = () => (<div id='colorScales'>
  <h2>Цветовая шкала</h2>
  <table>
    <tbody>
      { Object.keys(colorScalesLabels).map(rating => <tr key={ rating }>
        <td>{ colorScalesLabels[rating] }</td>
        { colorScales[rating].map((scale, index) => <td className={ `bg_${scaleColors[index]}` } key={ scale }>
          { (index === 0) ? `${scale}+` : <span>{ renderScale(colorScales[rating][index - 1], rating) }&nbsp;&mdash;&nbsp;{ scale }</span> }
        </td>) }
        <td className='bg_red'>{ renderScale(colorScales[rating][colorScales[rating].length - 1], rating) }&nbsp;&mdash;&nbsp;0</td>
      </tr>) }
    </tbody>
  </table>
</div>);

export default ColorScales;
