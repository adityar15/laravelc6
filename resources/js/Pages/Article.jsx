import MarkdownRender from '../components/MarkdownRender'

export default function Article({blog}) {
  return (
    <div className='flex flex-col gap-5 my-4'>
        <h1 className='text-3xl font-semibold'>{blog.title}</h1>
        <MarkdownRender articleBody={blog.article} />
    </div>
  )
}
