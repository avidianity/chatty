import React, { DetailedHTMLProps, HTMLAttributes, forwardRef } from 'react';

interface Props
    extends DetailedHTMLProps<HTMLAttributes<HTMLDivElement>, HTMLDivElement> {}

const Card = forwardRef<HTMLDivElement, Props>(
    ({ className, ...props }, ref) => (
        <div
            ref={ref}
            className={`px-8 bg-white shadow-lg pb-10 pt-8 rounded-md ${
                className ?? ''
            }`}
            {...props}
        >
            {props.children}
        </div>
    )
);

export default Card;
