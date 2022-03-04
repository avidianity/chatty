import React, { FC } from 'react';
import { Link } from 'react-router-dom';
import Button from '../components/Button';
import Card from '../components/Card';
import Input from '../components/Forms/Input';
import { routes } from '../routes';

type Props = {};

const Login: FC<Props> = (props) => {
    return (
        <div className="h-screen w-screen flex justify-center items-center bg-sky-50">
            <Card className="container mb-10 w-11/12 sm:w-3/4 md:w-2/4 lg:w-2/6 xl:w-2/6">
                <img
                    src="/assets/logo.png"
                    alt="Chatty"
                    className="mx-auto h-36 w-36 rounded-full border border-gray-200 object-cover"
                />
                <h2 className="text-xl font-semibold mt-4">Sign In</h2>
                <p className="mb-2">Enter your credentials to get started</p>
                <form>
                    <div className="my-3">
                        <Input
                            type="text"
                            name="username"
                            placeholder="Username/Email"
                        />
                    </div>
                    <div className="my-3">
                        <Input
                            type="password"
                            name="password"
                            placeholder="Password"
                        />
                    </div>
                    <div className="my-3">
                        <Button type="submit" className="w-full">
                            Sign In
                        </Button>
                    </div>
                    <div className="my-3">
                        Don't have an account?{' '}
                        <Link
                            to={routes.register}
                            className="hover:text-blue-600 text-blue-400"
                        >
                            Sign Up
                        </Link>
                    </div>
                </form>
            </Card>
        </div>
    );
};

export default Login;
