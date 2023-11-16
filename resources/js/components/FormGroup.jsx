import React from 'react'

export default function FormGroup({
    label,
    placeholder,
    type = "text",
    errorMessage,
    ...other
}) {
    return (
        <div className="flex flex-col gap-2">
            <label htmlFor="">
                {label}
            </label>
            <input {...other} type={type} name={name} placeholder={placeholder} className="p-2 border border-orange-500 rounded" />
            <span className='text-red-500'>{errorMessage}</span>
        </div>
    )
}
