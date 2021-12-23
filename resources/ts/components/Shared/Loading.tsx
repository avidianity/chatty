import React, { FC } from 'react';

type Props = {};

const Loading: FC<Props> = (props) => {
    return (
        <div className="h-screen w-screen opacity-75 flex justify-center items-center">
            <div className="flex flex-col justify-center">
                <img
                    src="/assets/logo-notext.png"
                    alt="Chatty"
                    className="motion-safe:animate-bounce h-30 w-30 mx-auto"
                />
                <img src="/assets/logo-text.png" alt="Chatty" />
            </div>
        </div>
    );
};

export default Loading;
