import {useState, useEffect} from 'react'

import DOMPurify from 'isomorphic-dompurify';

import {marked} from 'marked'


export default function useMarkdown(dirtyText)
{
    const [cleanText, setCleanText] = useState('')

    useEffect(()=>{
       
          //defensive programming
        if(!dirtyText)
        return 

        const parsedHTML = marked.parse(dirtyText)
       
        setCleanText( DOMPurify.sanitize(parsedHTML))

    }, [dirtyText])

    return {
        cleanText
    }
}