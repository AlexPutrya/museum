import React, { Component } from 'react';
import ReactDOM from 'react-dom';

// Общая форма
class Form extends React.Component {

    render(){
        return(
            <form action="">
                <Photo />
                <UploadPhoto />
                <div className="form-group">
                    <label> Название </label>
                    <input type="text" className="form-control" placeholder="Название экспоната (не будет отображатся нигде)"/>
                </div>
                <TitleInput />
                <Text />
                <button onClick={(e) => this.handleClick(e, "John", "Заголовок 2")}>
                    Click me
                </button>
            </form>
        );
    }
}


// место для фотографии
class Photo extends Component {
    render() {
        return(
            <img src="" alt="" className="img-thumbnail"/>
        );
    }
}

// Кнопка загрузки фото
class UploadPhoto extends Component {
    render() {
        return(
            <div className="form-group">
                <label>Загрузить фото</label>
                <input type="file" className="form-control-file"/>
            </div>
        );
    }
}

// Заголовок для статьи
class TitleInput extends Component {
    render() {
        return(
            <div className="form-group">
                <label> Заголовок </label>
                <input type="text" className="form-control" placeholder="Заголовок для страиницы с экспонатом"/>
            </div>
        );
    }
}

// Текст статьи
class Text extends Component {
    render() {
        return(
            <div className="form-group">
                <label>Текст статьи</label>
                <textarea className="form-control" rows="5"></textarea>
            </div>
        );
    }
}

ReactDOM.render(<Form />, document.getElementById('form'));
