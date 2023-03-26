$(".editor").each(function() {
    CKEDITOR.replace($(this).attr("name"), {
        extraPlugins: 'uploadimage,image2,embed,autoembed,',
        extraAllowedContent :'iframe[*]',
        language_list:[ 'fr:French' ,'ar:Arabic:rtl', ],
        dialog_buttonsOrder:'ltr',
        embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
        AllowedContent :true,
        filebrowserUploadUrl: $(this).attr("upload-url"),
        filebrowserUploadMethod: 'form',
        toolbarGroups: [{
                name: 'document',
                groups: ['mode', 'document', 'doctools']
            },
            {
                name: 'clipboard',
                groups: ['clipboard', 'undo']
            },
            {
                name: 'editing',
                groups: ['find', 'selection', 'spellchecker', 'editing']
            },
            {
                name: 'forms',
                groups: ['forms']
            },
            '/',
            {
                name: 'basicstyles',
                groups: ['basicstyles', 'cleanup']
            },
            {
                name: 'paragraph',
                groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
            },
            {
                name: 'links',
                groups: ['links']
            },
            {
                name: 'insert',
                groups: ['insert']
            },
            '/',
            {
                name: 'styles',
                groups: ['styles']
            },
            {
                name: 'colors',
                groups: ['colors']
            },
            {
                name: 'tools',
                groups: ['tools']
            },
            {
                name: 'others',
                groups: ['others']
            },
            {
                name: 'about',
                groups: ['about']
            }
        ]
    });
});