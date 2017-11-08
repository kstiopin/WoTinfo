import React, { Component } from 'react';

import ColorScales from './ColorScales';

export class Links extends Component {
  componentWillMount() {
    const { getLinks, links } = this.props;
    if (!links) {
      getLinks();
    }
  }

  render() {
    const { links, userData } = this.props;
    if (!links) {
      return null;
    }

    return (
      <div id='links'>{ links.map((link) =>
        <a href={ link.link.replace('$nickname', userData.nickname).replace('$account', userData.account_id) } key={ link.id } target='_blank'>
          <h2>{ link.name }</h2>
          <span>{ link.text }</span>
        </a>) }
        <ColorScales />
      </div>);
  }
}

export default Links;