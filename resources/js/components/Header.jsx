import React from 'react'
import { Link } from "@inertiajs/react"

function NavItem({href, className, children}) {
    return (
    <li className={`text-lg text-white ${className}`}>
        <Link href={href}>
            {children}
        </Link>
    </li>
    )
}


export default function Header() {
    return (
        <header className="w-full h-20 p-4 bg-orange-600 flex items-center justify-between">
            <span className="text-4xl font-semibold text-white">Logo</span>

            <ul className='flex items-center gap-2'>
                <NavItem href="/">Register</NavItem>
                <NavItem href="/login">Login</NavItem>
            </ul>
        </header>
    )
}
