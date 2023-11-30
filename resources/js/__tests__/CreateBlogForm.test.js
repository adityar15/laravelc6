import {render} from "@testing-library/react"
import renderer from 'react-test-renderer';
import CreateBlog from "../Pages/CreateBlog"
import React from "react"

test('renders the CreateBlog form', () => {
    const { getByText } = render(<CreateBlog />);

    // checks if the form is rendered by looking for labels
    expect(getByText('Title')).toBeInTheDocument();
    expect(getByText('Slug')).toBeInTheDocument();
    expect(getByText('Actual Article')).toBeInTheDocument();


    // checks if the form is rendered by looking for Button 
    expect(getByText('Create')).toBeInTheDocument();

    // match snapshot of entire component
    const component = renderer.create(<CreateBlog />);
    let tree = component.toJSON();
    expect(tree).toMatchSnapshot();

    // checks if the form is rendered by looking for input fields

    // may be you as a homework can write the test for input fields

  });