import React, {
    DetailedHTMLProps,
    InputHTMLAttributes,
    forwardRef,
} from 'react';

interface Props
    extends DetailedHTMLProps<
        InputHTMLAttributes<HTMLInputElement>,
        HTMLInputElement
    > {}

const Input = forwardRef<HTMLInputElement, Props>(
    ({ name, type, placeholder, className, ...props }, ref) => {
        return (
            <>
                <label
                    htmlFor={name}
                    className="block text-gray-700 text-sm font-bold mb-1"
                >
                    {placeholder}
                </label>
                <input
                    ref={ref}
                    type={type ?? 'text'}
                    name={name}
                    id={name}
                    placeholder={placeholder}
                    className={`${
                        className ?? ''
                    } shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-300`}
                    {...props}
                />
            </>
        );
    }
);

export default Input;
