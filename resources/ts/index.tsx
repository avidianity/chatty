import axios from 'axios';
import React from 'react';
import { render } from 'react-dom';
import App from './components/App';
import '@avidian/extras';
import './shims';

axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.withCredentials = true;

render(<App />, document.getElementById('app'));
