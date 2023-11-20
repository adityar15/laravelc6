import React from 'react'
import GuestLayout from '../components/layouts/GuestLayout'
import { useForm } from '@inertiajs/react'
import FormGroup from '../components/FormGroup'

export default function CreateBlog() {
 
    const { data, setData, post, errors, processing } = useForm({
        title: "",
        article: "",
        slug: ""
    })

    function handleSubmit(e)
    {
        e.preventDefault()
        // change this
        post('/create-blog', {
            onSuccess: ()=>{
                // anything after success
            }
        })
    }

    return (
        <>
            <form onSubmit={handleSubmit}>
                <FormGroup label="Title" placeholder="Enter a title for your article" value={data.title} onChange={
                    (e) => setData("title", e.target.value)
                } 
                errorMessage={errors.title}
                />
                <FormGroup label="Slug" placeholder="Enter an unique slug" type="text" value={data.slug} onChange={
                    (e) => setData("slug", e.target.value)
                } 
                errorMessage={errors.slug}
                />
                <FormGroup label="Actual Article" placeholder="Type your article in no more than 500 words" type="textarea" value={data.article} onChange={
                    (e) => setData("article", e.target.value)
                } 
                errorMessage={errors.article}
                />

                <button disabled={processing} className='bg-orange-500 text-white px-4 py-2'>Create</button>
            </form>
        </>
    )
}


CreateBlog.layout = page => <GuestLayout children={page} title="Create article" />