// Editor : block.js

var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    Editable = wp.blocks.Editable,
    BlockControls = wp.blocks.BlockControls,
    AlignmentToolbar = wp.blocks.AlignmentToolbar;

registerBlockType('gutenberg-boilerplate/hello-world', {
    title: 'Hello World',

    icon: 'universal-access-alt',

    category: 'layout',

    attributes: {
        content: {
            type: 'array',
            source: 'children',
            selector: 'p',
        },
        alignment: {
            type: 'string',
        },
    },

    edit: function(props) {
        var content = props.attributes.content,
            alignment = props.attributes.alignment,
            focus = props.focus;

        function onChangeContent(newContent) {
            props.setAttributes({content: newContent});
        }

        function onChangeAlignment(newAlignment) {
            props.setAttributes({alignment: newAlignment});
        }

        return [
            !!focus && el(
                BlockControls,
                {key: 'controls'},
                el(
                    AlignmentToolbar,
                    {
                        value: alignment,
                        onChange: onChangeAlignment
                    }
                )
            ),
            el(
                Editable,
                {
                    key: 'editable',
                    tagName: 'p',
                    className: props.className,
                    style: {textAlign: alignment},
                    onChange: onChangeContent,
                    value: content,
                    focus: focus,
                    onFocus: props.setFocus
                }
            )
        ];
    },

    save: function(props) {
        // If rendering in PHP :
        //return null;

        // Else rendering content :
        var content = props.attributes.content,
            alignment = props.attributes.alignment;
        return el('p', {className: props.className, style: {textAlign: alignment}}, content);
    },
});