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

            {
                type == 'textarea' ? (
                    <textarea {...other} cols="30" rows="10" placeholder={placeholder} className="p-2 border border-orange-500 rounded"></textarea>
                ) :  <input {...other} type={type} placeholder={placeholder} className="p-2 border border-orange-500 rounded" />
            }

           
            <span className='text-red-500'>{errorMessage}</span>
        </div>
    )
}
