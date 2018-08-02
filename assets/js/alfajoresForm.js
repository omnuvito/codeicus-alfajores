import React from 'react';
import ReactDOM from 'react-dom';

class AlfajoresForm extends React.Component {
    constructor() {
        super();
        this.state = {
            alfajor: null
        };
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    //Function to set and send form data to API POST
    handleSubmit(event) {
        event.preventDefault();
        const data = new FormData(event.target);

        fetch('/api/alfajores', {
            method: 'POST',
            body: data
        }).then(response => response.json())
            .then(
                alfajor => {
                    this.setState({
                        alfajor
                    })
                }
            );

    }

    //Function to render form
    render() {
        return (
            <div>
                {(this.state.alfajor) ? <div className={this.state.alfajor.mc} role="alert">{this.state.alfajor.response}</div> : ''}
                <form onSubmit={this.handleSubmit}>
                    <div>
                        <h3>Crea un nuevo alfajor</h3>
                    </div>
                    <div className="form-group">
                        <label htmlFor="name">Gusto</label>
                        <input className="form-control" type="text" id="gusto" name="gusto"/>
                    </div>
                    <div className="form-group">
                        <label htmlFor="letter">Letra</label>
                        <input className="form-control" type="text" id="letra" name="letra"/>
                    </div>
                    <div className="form-group">
                        <label htmlFor="price">Valor</label>
                        <input className="form-control" type="text" id="valor" name="valor"/>
                    </div>

                    <button className="btn btn-primary">Crear Alfajor</button>
                </form>
            </div>
        );
    }
}

ReactDOM.render(<AlfajoresForm />, document.getElementById('alfajorForm'));