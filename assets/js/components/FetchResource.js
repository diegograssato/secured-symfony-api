import React, {Component} from 'react';
import {withRouter} from 'react-router-dom';
import auth0Client from '../utility/Auth';
import axios from 'axios';


class FetchResource extends Component {

    constructor(props) {
        super(props);
    }

    fetch = () => {
        axios.get('http://localhost:8000/api/public',
            {
                headers: {'Authorization': `Bearer ${auth0Client.getIdToken()}`}
            })
            .then(res => {
                console.log(res);
                this.props.history.push('/');
            })
    }

    render() {
        return (
            <div>
                <button
                    className={"btn btn-success"}
                    onClick={() => {this.fetch()}}
                >
                    Fetch Resources
                </button>
            </div>
        )
    }
}

export default FetchResource;