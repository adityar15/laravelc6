import FormGroup from '../components/FormGroup'
import GuestLayout from '../components/layouts/GuestLayout'
import { useForm } from '@inertiajs/react'

const Register = () => {

    const { data, setData, post, errors, processing } = useForm({
        email: "",
        password: "",
        name: ""
    })

    function handleSubmit(e)
    {
        e.preventDefault()
        post('/register', {
            onSuccess: ()=>{
                // anything after success
            }
        })
    }

    return (
        <>
            <form onSubmit={handleSubmit}>
                <FormGroup label="Full Name" placeholder="Enter your full name" value={data.name} onChange={
                    (e) => setData("name", e.target.value)
                } 
                errorMessage={errors.name}
                />
                <FormGroup label="Email" placeholder="Enter your email" type="email" value={data.email} onChange={
                    (e) => setData("email", e.target.value)
                } 
                errorMessage={errors.email}
                />
                <FormGroup label="Password" placeholder="Enter your password" type="password" value={data.password} onChange={
                    (e) => setData("password", e.target.value)
                } 
                errorMessage={errors.password}
                />

                <button disabled={processing} className='bg-orange-500 text-white px-4 py-2'>Register</button>
            </form>
        </>
    )
}


Register.layout = page => <GuestLayout children={page} title="Sign Up" />


export default Register