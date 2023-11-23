import React from 'react'
import useMarkdown from '../hooks/use-markdown'

export default function MarkdownRender({articleBody}) {

  const {cleanText} = useMarkdown(articleBody)

  return (
    <div dangerouslySetInnerHTML={{__html: cleanText}} className='prose'></div>
  )
}
