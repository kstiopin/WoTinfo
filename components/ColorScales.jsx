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

const ColorScales = () => (<div id='colorScales'>
  <h2>Цветовая шкала</h2>
  <table>
    <tbody>
      { Object.keys(colorScalesLabels).map(rating => <tr key={ rating }>
        <td>{ colorScalesLabels[rating] }</td>
        { colorScales[rating].map((scale, index) => <td className={ `bg_${scaleColors[index]}` } key={ scale }>
          { (index === 0) ? `${scale}+` : <span>{ colorScales[rating][index - 1] - 1 }&nbsp;&mdash;&nbsp;{ scale }</span> }
        </td>) }
        <td className='bg_red'>{ (colorScales[rating][colorScales[rating].length - 1] - 1).toFixed(2) }&nbsp;&mdash;&nbsp;0</td>
      </tr>) }
    </tbody>
  </table>
</div>);

export default ColorScales;