import React, { FC } from 'react';
import { Link } from 'react-router-dom';
import { routes } from '../routes';

type Props = {};

const Login: FC<Props> = (props) => {
    return (
        <div className="h-screen w-screen flex justify-center items-center bg-sky-50">
            <form className="container h-100 px-8 w-11/12 sm:w-3/4 md:w-2/4 lg:w-2/6 xl:w-1/5 bg-white shadow-lg pb-10 pt-8 rounded-md mb-10">
                <img
                    src="/assets/logo.png"
                    alt="Chatty"
                    className="mx-auto h-36 w-36 rounded-full border border-gray-200"
                />
                <h2 className="text-xl font-semibold mt-4">Sign In</h2>
                <p className="mb-2">Enter your credentials to get started</p>
                <div className="my-3">
                    <label
                        htmlFor="username"
                        className="block text-gray-700 text-sm font-bold mb-1"
                    >
                        Username/Email
                    </label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Username/Email"
                        className="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                </div>
                <div className="my-3">
                    <label
                        htmlFor="username"
                        className="block text-gray-700 text-sm font-bold mb-1"
                    >
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                        className="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                </div>
                <div className="my-3">
                    <button className="bg-blue-500 hover:bg-blue-700 font-bold text-white py-2 px-4 rounded-lg w-full">
                        Sign In
                    </button>
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
        </div>
    );
};

export default Login;
