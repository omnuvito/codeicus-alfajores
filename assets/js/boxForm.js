import React from 'react';
import ReactDOM from 'react-dom';

class BoxForm extends React.Component {
    constructor() {
        super();
        this.handleSubmit = this.handleSubmit.bind(this);
        this.state = {
            price: null,
            gustos: []
        };
    }

    componentDidMount() {
        fetch('/api/alfajores')
            .then(response => response.json())
            .then(gustos => {
                this.setState({
                    gustos
                });
            });
    }

    //Function to set and send form data to API POST
    handleSubmit(event) {
        event.preventDefault();
        const data = new FormData(event.target);

        fetch('/api/calculate_price', {
            method: 'POST',
            body: data
        }).then(
                response => response.json()
        ).then(
            price => {
                this.setState({
                    price
                })
            }
        );
    }

    //Function to render form
    render() {
        return (
            <div>
                {(this.state.price) ? <div className={this.state.price.mc} role="alert">Precio de la caja: {this.state.price.response}</div> : ''}
                <form onSubmit={this.handleSubmit}>
                    <div>
                        <h3>Caja de Alfajores (Cálculo de precios)</h3>
                    </div>

                    <div className="row">
                        <div className="form-group">
                            <select className="form-control" name="row[0][0]" id="gusto1">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>

                        <div className="form-group">
                            <select className="form-control" name="row[0][1]" id="gusto2">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>

                        <div className="form-group">
                            <select className="form-control" name="row[0][2]" id="gusto3">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>
                    </div>

                    <div className="row">
                        <div className="form-group">
                            <select className="form-control" name="row[1][0]" id="gusto4">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>

                        <div className="form-group">
                            <select className="form-control" name="row[1][1]" id="gusto5">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>

                        <div className="form-group">
                            <select className="form-control" name="row[1][2]" id="gusto6">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>
                    </div>

                    <div className="row">
                        <div className="form-group">
                            <select className="form-control" name="row[2][0]" id="gusto7">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>

                        <div className="form-group">
                            <select className="form-control" name="row[2][1]" id="gusto8">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>

                        <div className="form-group">
                            <select className="form-control" name="row[2][2]" id="gusto9">
                                {
                                    this.state.gustos.map(
                                        ({ gusto, letra }) => (
                                            <option value={letra}>{gusto}</option>
                                        )
                                    )
                                }
                            </select>
                        </div>
                    </div>

                    <button className="btn btn-primary">Calcular Precio</button>
                </form>
            </div>
        );
    }
}

ReactDOM.render(<BoxForm />, document.getElementById('boxForm'));