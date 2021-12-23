import React, { FC, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { useToken } from '../hooks';
import { routes } from '../routes';

type Props = {};

const NotFound: FC<Props> = (props) => {
    const navigate = useNavigate();
    const [token] = useToken();

    useEffect(() => {
        if (!token) {
            navigate(routes.login);
        }
    }, []);

    return <div>Not Found</div>;
};

export default NotFound;
