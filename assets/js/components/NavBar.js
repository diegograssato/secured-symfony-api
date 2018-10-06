import React from 'react';
import {Link, withRouter} from 'react-router-dom';
import auth0Client from '../utility/Auth';


const NavBar = (props) => {

    const signOut = () => {
        auth0Client.signOut();
        props.history.replace('/');
    };

    return(
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="#" className="navbar-brand"> Symfony React Application State MobX </a>
            <div className="collapse navbar-collapse" id="navbarText">
                <ul className="navbar-nav mr-auto">
                    <li className="nav-item">
                        <Link className={"nav-link"} to={"/"}> Post </Link>
                        {
                            !auth0Client.isAuthenticated() &&
                            <button className="btn btn-dark" onClick={auth0Client.signIn}>Sign In</button>
                        }
                        {
                            auth0Client.isAuthenticated() &&
                                <div>
                                    <label className="mr-2 text-white">{auth0Client.getProfile().name}</label>
                                    <button className="btn btn-dark" onClick={() => {signOut()}}>Sign Out</button>
                                </div>
                        }
                    </li>
                    <li className="nav-item">
                        <Link className={"nav-link"} to={"/resources"}> Resources </Link>
                    </li>

                    <li className="nav-item">
                        <Link clasName={"nav-link"} to={"/new-resources"}> Fetch New Resources </Link>
                    </li>
                </ul>
            </div>
        </nav>
    )
};

export default withRouter(NavBar);