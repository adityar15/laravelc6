import React from 'react'
import { Link, usePage } from '@inertiajs/react'

export default function BlogCard({ blog }) {

  const {user} = usePage().props
  console.log(blog)

  return (
    <div className="border border-gray-200 rounded p-5">
      <Link href={`/dashboard/blog/${blog?.slug}`}>
        <h1>{blog.title}</h1>
        <p>{blog?.author?.name}</p>
      </Link>

      <Link className='my-5 p-1 underline' href={`/blog/edit/${blog?.id}`}>Edit</Link>
     {
      user?.id == blog?.author?.id && ( <Link className='my-5 p-1 underline' href={`/blog/delete/${blog?.id}`}>Delete</Link>)
     }
    </div>
  )
}
