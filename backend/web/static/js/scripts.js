function transliterate(word){

    var answer = "", a = {};
    a["Ё"]="yo";a["Й"]="i";a["Ц"]="ts";a["У"]="u";a["К"]="u";a["Е"]="e";a["Н"]="n";a["Г"]="g";a["Ш"]="sh";
    a["Щ"]="sch";a["З"]="z";a["Х"]="x";a["Ъ"]="";a["ё"]="yo";a["й"]="i";a["ц"]="ts";a["у"]="u";a["к"]="k";
    a["е"]="e";a["н"]="n";a["г"]="g";a["ш"]="sh";a["щ"]="sch";a["з"]="z";a["х"]="h";a["ъ"]="";a["Ф"]="f";
    a["Ы"]="i";a["В"]="v";a["А"]="a";a["П"]="p";a["Р"]="r";a["О"]="o";a["Л"]="l";a["Д"]="d";a["Ж"]="zh";
    a["Э"]="e";a["ф"]="f";a["ы"]="i";a["в"]="v";a["а"]="a";a["п"]="p";a["р"]="r";a["о"]="o";a["л"]="l";
    a["д"]="d";a["ж"]="zh";a["э"]="e"; a[" "]="-";a["Я"]="ya";a["Ч"]="ch";a["С"]="s";a["М"]="m";a["И"]="i";
    a["Т"]="t";a["Ь"]="";a["Б"]="b";a["Ю"]="yu";a["я"]="ya";a["ч"]="ch";a["с"]="s";a["м"]="m";a["и"]="i";
    a["т"]="t";a["ь"]="";a["б"]="b";a["ю"]="yu";

    for (i in word){
        if (word.hasOwnProperty(i)) {
            if (a[word[i]] === undefined){
                answer += word[i];
            } else {
                answer += a[word[i]];
            }
        }
    }

    return answer;
}




function getSlug(slug) {
    // $.ajax({
    //     url: '/translations/getslug',
    //     type: 'post',
    //     data: {
    //         slug: slug,
    //     },
    //     success: function (data) {
    //         if (data.status){
    //             $('.urlcount').val(data.count);
    //             $('.slug').val(data.data);
    //         }else {
    //             $('.slug').val( slug);
    //         }
    //     }
    // });
    $('.slug').val( slug);
}
function getSlugRu(slug) {
    // $.ajax({
    //     url: '/translations/getslug',
    //     type: 'post',
    //     data: {
    //         slug: slug,
    //     },
    //     success: function (data) {
    //         if (data.status){
    //             $('.urlcount').val(data.count);
    //             $('.slugru').val(data.data);
    //         }else {
    //             $('.slugru').val( slug);
    //         }
    //     }
    // });
    // $('.slug').val( slug);
    $('.slugru').val( slug);
    // $('.slugen').val( slug);
}
function getSlugEn(slug) {
    // $.ajax({
    //     url: '/translations/getslug',
    //     type: 'post',
    //     data: {
    //         slug: slug,
    //     },
    //     success: function (data) {
    //         if (data.status){
    //             $('.urlcount').val(data.count);
    //             $('.slugru').val(data.data);
    //         }else {
    //             $('.slugru').val( slug);
    //         }
    //     }
    // });
    // $('.slug').val( slug);
    // $('.slugru').val( slug);
    $('.slugen').val( slug);
}


$(function () {
    $('.title').change(function(){
        var categoryName = $('.title').val().replace(/[^a-zA-Zа-яА-Я ]/g, "").trim().replace(/\s+/g, " ");
        var slug = transliterate(categoryName.toLowerCase());
         getSlug(slug);
        // setSlug(slug);
    });

    $('.slug').change(function(){
        var categoryName = $('.slug').val().trim().replace(/\s+/g, " ");
        var slug = transliterate(categoryName.toLowerCase());
        getSlug(slug);
        // setSlug(slug);
    });

    $('.titleru').change(function(){
        var categoryName = $('.titleru').val().replace(/[^a-zA-Zа-яА-Я ]/g, "").trim().replace(/\s+/g, " ");
        var slug = transliterate(categoryName.toLowerCase());
        getSlugRu(slug);
        // setSlug(slug);
    });

    $('.slugru').change(function(){
        var categoryName = $('.slugru').val().trim().replace(/\s+/g, " ");
        var slug = transliterate(categoryName.toLowerCase());
        getSlugRu(slug);
        // setSlug(slug);
    });

    $('.titleen').change(function(){
        var categoryName = $('.titleen').val().replace(/[^a-zA-Zа-яА-Я ]/g, "").trim().replace(/\s+/g, " ");
        var slug = transliterate(categoryName.toLowerCase());
        getSlugEn(slug);
        // setSlug(slug);
    });

    $('.slugen').change(function(){
        var categoryName = $('.slugen').val().trim().replace(/\s+/g, " ");
        var slug = transliterate(categoryName.toLowerCase());
        getSlugEn(slug);
        // setSlug(slug);
    });
});