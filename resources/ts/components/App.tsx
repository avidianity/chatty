import { useLocalStorage, useToggle } from '@avidian/hooks';
import axios, { AxiosError } from 'axios';
import React, { FC, useEffect } from 'react';
import Loading from './Shared/Loading';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import { routes } from '../routes';
import Login from '../views/Login';
import NotFound from './NotFound';
import { useToken } from '../hooks';

type Props = {};

const App: FC<Props> = (props) => {
    const [loaded, setLoaded] = useToggle(false);
    const [token, setToken] = useToken();

    const getCookie = async () => {
        await axios.get('/sanctum/csrf-cookie').catch(console.error);
    };

    const validateToken = async (token: string) => {
        try {
            await axios.get('/api/auth/check', {
                headers: { Authorization: `Bearer ${token}` },
            });
        } catch (error) {
            if ((error as AxiosError)?.response?.status === 401) {
                setToken(null);
            }
        }
    };

    const start = async () => {
        await getCookie();
        if (token) {
            await validateToken(token);
        }
        setLoaded(true);
    };

    useEffect(() => {
        start();
    }, []);

    if (!loaded) {
        return <Loading />;
    }

    return (
        <BrowserRouter>
            <Routes>
                <Route path={routes.login} element={<Login />} />
                <Route path="*" element={<NotFound />} />
            </Routes>
        </BrowserRouter>
    );
};

export default App;
