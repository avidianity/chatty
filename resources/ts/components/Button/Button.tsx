import React, {
    DetailedHTMLProps,
    forwardRef,
    ButtonHTMLAttributes,
} from 'react';

interface Props
    extends DetailedHTMLProps<
        ButtonHTMLAttributes<HTMLButtonElement>,
        HTMLButtonElement
    > {}

const Button = forwardRef<HTMLButtonElement, Props>(
    ({ children, className, ...props }, ref) => {
        return (
            <button
                ref={ref}
                className={`${
                    className ?? ''
                } bg-blue-500 hover:bg-blue-700 font-bold text-white py-2 px-4 rounded-lg`}
                {...props}
            >
                {children}
            </button>
        );
    }
);

export default Button;
