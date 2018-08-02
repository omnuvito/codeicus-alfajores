import React from 'react';
import ReactDOM from 'react-dom';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import AlfajorCard from './Components/AlfajorCard';

class Alfajor extends React.Component {
    constructor() {
        super();

        this.state = {
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

    render() {
        return (
            <MuiThemeProvider>
                <div style={{ display: 'flex' }}>
                    {
                        this.state.gustos.map(
                            ({ gusto, letra, valor }) => (
                                <AlfajorCard gusto={gusto} letra={letra} style={{ flex: 1, margin: 5 }} valor={valor}>
                                </AlfajorCard>
                            )
                        )
                    }
                </div>
            </MuiThemeProvider>
        );
    }
}

ReactDOM.render(<Alfajor />, document.getElementById('alfajor'));