import Header from '../Header'
import { Head } from "@inertiajs/react"

export default function GuestLayout({ children, title }) {
    return (
        <>
            <Head>
                <title>{title}</title>
            </Head>

            <Header />
            <main className="max-w-lg mx-auto">
                {children}
            </main>
        </>
    )
}
