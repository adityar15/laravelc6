import React from 'react'
import BlogCard from '../components/BlogCard'




export default function Dashboard({blogs}) {

  return (
    <div className='flex flex-col gap-5 my-10'>
      {
        blogs && blogs?.data?.map(blog => <BlogCard key={blog?.id} blog={blog} />)
      }
    </div>
  )
}
