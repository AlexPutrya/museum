import React, { Component } from 'react';
import ReactDOM from 'react-dom';
//
// class Example extends Component {
//     render() {
//         return (
//             <div>
//                 <h1> Cool, School </h1>
//             </div>
//         );
//     }
// }
//
// export default Example;
//
// if (typeof window !== 'undefined') {
//     window.React = React;
// }
//
// ReactDOM.render(<Example/>, document.getElementById('example'));
const element = <h1>Hello, world</h1>;
ReactDOM.render(
  element,
  document.getElementById('example')
);
