import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import App from './app'

export default class Example extends Component {
    render() {
        return (
           <App/>
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(<Example />, document.getElementById('root'));
}
