(function() {

    /* global $ */

    // var csrf = null;

    var genericAjax = function(url, data, type, callBack) {
        $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
            })
            .done(function(json) {
                console.log('ajax done');
                // console.log(json);
                callBack(json);
            })
            .fail(function(xhr, status, errorThrown) {
                console.log('ajax fail');
            })
            .always(function(xhr, status) {
                console.log('ajax always');
            });
    };

    var formAjax = function(url, data, type, callBack) {
        $.ajax({
                url: url,
                data: data,
                type: type,
                processData: false,
                contentType: false,
                dataType: 'json',
            })
            .done(function(json) {
                console.log('ajax done');
                console.log(json);
                callBack(json);
            })
            .fail(function(xhr, status, errorThrown) {
                console.log('ajax fail');
            })
            .always(function(xhr, status) {
                console.log('ajax always');
            });
    };

    var simpleAjax = function(url, callBack) {
        genericAjax(url, null, 'get', callBack);
    };


    console.log('ahora');


    // Añadimos información a tabla
    genericAjax('../../ajaxPeticionAllUser', null, 'get', function(ajax) {

        //Visualización de todos los usuarios
        //     let users = ajax.data;

        //     var arrayDatos = '';

        //     console.log(users);

        //     for (var i = 0; i < users.length; i++) {

        //         arrayDatos += ('<tr>' +
        //             '<td>' + users[i].id + '</td>' +
        //             '<td>' + users[i].name + '</td>' +
        //             '<td>' + users[i].email + '</td>' +
        //             '<td>' + users[i].type + '</td>' +
        //             '<td>' + '<button type="button" class="btn btn-outline-danger" id="eliminar_separador_' + users[i].name + '_separador_con_separador_id_separador_' + users[i].name + '_separador_' + users[i].type + '" data-toggle="modal" data-target="#ModalEliminate"> Eliminar </button>' + '</td>' +
        //             '</tr>');

        //     }

        // $('#ajaxTbody').html(arrayDatos);
        console.log(ajax);

        // console.log(ajax.data[0].id);
        // console.log(ajax);




        var getPageLink = function(page) {
            return `<li class="page-item" style="list-style: none !important;">
                        <a class="page-link active-page " data-page="${page}" href="../../#">${page}</a>
                    </li>`;
        }

        var getPaginator = function(data) {
            console.log('data');
            console.log(data);
            let previousOn =
                `<li class="page-item" style="list-style: none !important;"  aria-label="Ã‚Â« Anterior">
                    <a class="page-link active-page" href="../../#" data-page="${data.current_page-1}" rel="previous" aria-label="Ã‚Â« Anterior">Previous</a>
                </li>`;

            let previousOff =
                `<li class="page-item disabled" style="list-style: none !important;" aria-disabled="true" aria-label="Ã‚Â« Anterior">
                    <span class="page-link" aria-hidden="true">Previous</span>
                </li>`;
            let nextOn =
                `<li class="page-item" style="list-style: none !important;">
                    <a class="page-link active-page" style="list-style: none !important;" data-page="${data.current_page+1}" href="../../#" rel="next" aria-label="Siguiente Ã‚Â»">Next</a>
                </li>`;
            let nextOff =
                `<li class="page-item disabled" style="list-style: none !important;" aria-disabled="true" aria-label="Siguiente Ã‚Â»">
                    <span class="page-link" aria-hidden="true">Next</span>
                </li>`;
            let current =
                `<li class="page-item active" style="list-style: none !important;" aria-current="page">
                    <span class="page-link">${data.current_page}</span>
                </li>`;
            let between =
                `<li class="page-item disabled" style="list-style: none !important;" aria-disabled="true">
                    <span class="page-link">...</span>
                </li>`;

            var result = '';
            if (data.current_page == 1) {
                result += previousOff;
            }
            else {
                result += previousOn;
            }
            if (data.current_page > 2) {
                result += between;
            }

            for (var i = data.current_page - 2; i <= data.current_page + 2; i++) {
                if (i < 1) {

                }
                else if (i > data.last_page) {

                }
                else if (i == data.current_page) {
                    result += current;
                }
                else {
                    result += getPageLink(i);
                }
            }

            if (data.current_page < data.last_page - 1) {
                result += between;
            }
            if (data.current_page == data.last_page) {
                result += nextOff;
            }
            else {
                result += nextOn;
            }
            return result;

        }


        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        var getUsersBody = function(response) {
            var ajaxdata = response.data;
            var content = '';
            for (var i = 0; i < ajaxdata.length; i++) {
                content += getUsersTable(ajaxdata[i], response.authenticated, response.rooturl);
            }
            return content;
        };


        var getUsersTable = function(row, authenticated, rootUrl) {
            var content = '';
            content += '<td>' + row.id + '</td>';
            content += '<td>' + row.name + '</td>';
            content += '<td>' + row.email + '</td>';
            content += '<td>' + row.type + '</td>';
            content += '<td>' +
                '<button type="button" id="btnEdit" data-id="' + row.id + '" data-name="' + row.name + '" class="btn btn-outline-success">Editar</button>' +
                '<button type="button" id="ajaxModalDelete" data-id="' + row.id + '"  data-name="' + row.name + '" class="btn btn-outline-danger" data-target="#ajaxModalDelete">Eliminar</button>' +
                '</td>';

            return '<tr>' + content + '</tr>';
        };

        var request = function(pagenumber, history = true) {
            genericAjax('../../ajaxPeticionAllUser', { page: pagenumber }, 'get', function(param1) {
                console.log('param1');
                console.log(param1);
                $('#ajaxTbody').empty();
                $('#ajaxUserLink').empty();
                $('#ajaxTbody').append(getUsersBody(param1));
                $('#ajaxUserLink').append(getPaginator(param1));
                if (history) {
                    window.history.pushState({ id: pagenumber }, null, '?page=' + pagenumber);
                }
            });
        }

        window.onpopstate = function(e) {
            console.log('e:');
            console.log(e);
            var id = e.state.id;
            request(id, false);
        };

        if ($('#ajaxTbody').length > 0) {
            var page = getParameterByName('page');
            if (!page) {
                page = 1;
            }
            request(page);
        }

        $('#ajaxUserLink').on('click', '.active-page', function(event) {
            event.preventDefault();
            console.log($(this).attr('data-page'));
            var page = $(this).attr('data-page');
            request(page);
        });


        // ------------------------------------------------------------------------------
        // ELIMINAR
        // ------------------------------------------------------------------------------

        // $(document).delegate("#ajaxModalDelete", "click", function(e) {

        //     var id = $(this).attr("data-id");
        //     var name = $(this).attr("data-name");

        //     $('#ajaxaquivamifrase').html('Has seleccionado a ' + name + 'con id: ' + id);


        //     genericAjax('delete/' + id, { id: id }, 'get', function(param1) {

        //         if (param1.contact) {
        //             alert('The user has been successfully deleted');
        //             request(page);
        //         }
        //         else {
        //             alert('The user has been NOT successfully deleted');
        //         }

        //     });

        // });



    });

})();



// // LINKS PAGINATE

// var getPageLink = function(page) {
//     return '<li class="page-item">  <a class="page-link active-page" data-page="' + page + '" href="#">' + page + '</a> </li>';
// }

// var getPaginator = function(data) {

//     let previousOn = '<li class="page-item" aria-label="« Anterior"> <a class="page-link active-page" href="#" data-page="' + (data.current_page - 1) + '" rel="previous" aria-label="« Anterior"> ‹ </a> </li>';

//     let previousOff = '<li class="page-item disabled" aria-disabled="true" aria-label="« Anterior"> <span class="page-link" aria-hidden="true">‹</span></li >';

//     let nextOn = '<li class="page-item"> <a class="page-link active-page" data-page="' + (data.current_page + 1) + '" href="' + data.next_page_url + '" rel="next" aria-label="Siguiente »">›</a></li>';

//     let nextOff = '<li class="page-item disabled" aria-disabled="true" aria-label="Siguiente »"> <span class="page-link" aria-hidden="true">z</span>›</li>';

//     let current = '<li class="page-item active" aria-current="page"> <span class="page-link">' + data.current_page + '</span></li>';

//     let between = '<li class="page-item disabled" aria-disabled="true"> <span class="page-link">...</span></li>';



//     // <li class="page-item disabled" aria-disabled="true" aria-label="« Previous"><span class="page-link" aria-hidden="true">‹</span></li>// <
//     // li class = "page-item active"
//     // aria - current = "page" > <span class="page-link">1</span> < /li>

//     //     <
//     //     li class = "page-item" > <a class="page-link" href="http://informatica.ieszaidinvergeles.org:9030/appCongresos/public/allPonencias?page=2">2</a> < /li>

//     //     <
//     //     li class = "page-item" > <a class="page-link" href="http://informatica.ieszaidinvergeles.org:9030/appCongresos/public/allPonencias?page=2" rel="next" aria-label="Next »">›</a> < /li>



//     // <nav>//     <ul class="pagination">

//     //         <li class="page-item disabled" aria-disabled="true" aria-label="« Anterior"> 
//     //             <span class="page-link" aria-hidden="true">‹</span>
//     //         </li >

//     //         <li class="page-item">  
//     //             <a class="page-link active-page" data-page="-1" href="#">-1</a> 
//     //         </li>

//     //         <li class="page-item">  
//     //             <a class="page-link active-page" data-page="0" href="#">0</a> 
//     //         </li>

//     //         <li class="page-item active" aria-current="page"> 
//     //             <span class="page-link">1</span>
//     //         </li>

//     //         <li class="page-item">  
//     //             <a class="page-link active-page" data-page="2" href="#">2</a> 
//     //         </li>

//     //         <li class="page-item">  
//     //             <a class="page-link active-page" data-page="3" href="#">3</a> 
//     //         </li>

//     //         <li class="page-item disabled" aria-disabled="true"> 
//     //             <span class="page-link">...</span>
//     //         </li>

//     //         <li class="page-item"> 
//     //             <a class="page-link active-page" data-page="2" href="http://informatica.ieszaidinvergeles.org:9030/appCongresos/public/ajaxPeticionAllUser?page=2" rel="next" aria-label="Siguiente »">›</a>
//     //         </li>
//     //     </ul>
//     // </nav>




//     var result = '<nav><ul class="pagination">';
//     if (data.current_page == 1) {
//         result += previousOff;
//     }
//     else {
//         result += previousOn;
//     }
//     if (data.current_page > 2) {
//         result += between;
//     }

//     for (var i = data.current_page - 2; i <= data.current_page + 2; i++) {

//         if (i < 1) {

//         }

//         if (i > data.last_page) {

//         }
//         else if (i == data.current_page) {
//             result += current;
//         }
//         else if (i > 0) {
//             result += getPageLink(i);
//         }
//     }

//     if (data.current_page < data.last_page - 1) {
//         result += between;
//     }
//     if (data.current_page == data.last_page) {
//         result += nextOff;
//     }
//     else {
//         result += nextOn;
//     }

//     result += '</ul></nav>';

//     console.log(result);

//     return result;


// }


// $('#ajaxUserLink').html(getPaginator(ajax));


// $('#ajaxUserLink').on('click', '.active-page', function(event) {
//     event.preventDefault();
//     console.log($(this).attr('data-page'));
//     var page = $(this).attr('data-page');
//     request(page);
// });
