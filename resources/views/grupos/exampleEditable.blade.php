<!DOCTYPE html>

<html>

<head>

    <title>Laravel Ajax Request using X-editable bootstrap Plugin Example</title>



    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>-->

<link rel="stylesheet" href="{{ asset('demo/plugins/x-editable/css/bootstrap-editable.css') }}">
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
-->
<script src="{{ asset('demo/plugins/x-editable/js/bootstrap-editable.min.js') }}"></script>

 <link rel="stylesheet" href="{{ asset('demo/plugins/select2/css/select2.min.css') }}">
<script src="{{ asset('demo/plugins/select2/js/select2.js') }}"></script> 

<script src="{{ asset('demo/plugins/select2/js/select2.min.js') }}"></script> 
 
</head>



<body>

<div class="container">

    <h3>Laravel Ajax Request using X-editable bootstrap Plugin Example</h3>


    <table class="table table-bordered">

        <tr>

            <th>Name</th>

            <th>Email</th>

            <th width="100px">Action</th>

        </tr>

       

            <tr>

                <td><a href="" class="accion" data-name="name" data-type="button" data-pk="1" data-title="Enter name">ONCLICK a </a></td>

                <td><a href="" class="update" data-name="email" data-type="email" data-pk="1" data-title="Enter email">email </a></td>

                <td><button class="btn btn-danger btn-sm">Delete</button></td>

            </tr>

            <tr>

                <td><a href="" class="updateSelect2" data-name="name" data-type="select2" data-pk="2" data-title="Enter name">name select2</a></td>

                <td><a href="" class="update" data-name="email" data-type="email" data-pk="2" data-title="Enter email">email</a></td>

                <td><button class="btn btn-danger btn-sm">Delete</button></td>

            </tr>

            <tr>

                <td><a href="" class="updateSelect" data-name="name" data-type="select" data-pk="3" data-title="Enter name">name Select updateselect</a></td>

                <td><a href="" class="update" data-name="email" data-type="email" data-pk="3" data-title="Enter email">email </a></td>

                <td><button class="btn btn-danger btn-sm">Delete</button></td>

            </tr>
       
    </table>

</div>

</body>
<a href="#" id="country" data-type="select" data-pk="1" data-value="ru" data-url="/post" data-title="Select country">acounry</a>
<a id="new_status" href="javascript:;" data-placement="right" data-value="Open">Open</a>
<a id="LinkTest" title="Any Title"  href="#" onclick="Function(); return false; ">text</a>

<div class="cont">
  <div class="container">
    <div class="single-item">1</div>
    <div class="single-item">2</div>
    <div class="single-item">3</div>
    <div class="single-item">4</div>
    <div class="single-item">5</div>
    <div class="single-item">6</div>
    <div class="single-item">7</div>
    <div class="single-item">8</div>
    <div class="single-item">9</div>
    <div class="single-item">10</div>
    <div class="single-item">11</div>
    <div class="single-item">12</div>
    <div class="single-item">13</div>
    <div class="single-item">14</div>
    <div class="single-item">15</div>
    <div class="single-item">16</div>
    <div class="single-item">17</div>
    <div class="single-item">18</div>
    <div class="single-item">19</div>
    <div class="single-item">20</div>
    <div class="single-item">21</div>
    <div class="single-item">22</div>
    <div class="single-item">23</div>
  </div>
</div>


<a href="javascript:myFunc()">href</a>
<a href="#" onclick="javascript:myFunc()">onclick</a>
<script type="text/javascript">
    function myFunc() {
    var s = 0;
    for (var i=0; i<100000; i++) {
        s+=i;
    }
    console.log(s);
}

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
//function()


    $('.update').editable({

           url: '/update-user',

           type: 'select2',

           pk: 1,

           name: 'name',

           title: 'Enter name'

    });
    $('.updateSelect').editable({

          source: [
            {id: 1, text: 'Test1'},
            {id: 2, text: 'Test2'},
            {id: 3, text: 'Test3'}
        ]

    });

$('#updateSelect2').editable( {
    params: function(params) {  //params already contain `name`, `value` and `pk`
      var data = {};
      data[params.name] = params.value;
      return data;
    },
    source: 'http://localhost/celeues/public/estudiante/bus/responsables',
    tpl: '<select></select>',
    ajaxOptions: {
        type: 'put'
        },
    select2: {
        cacheDatasource:true,
        width: '150px',
        id: function(pk) {
            return pk.id;
        },
        ajax: {
            url: 'http://localhost/celeues/public/estudiante/bus/responsables',
            dataType: "json",
            type: 'GET',
            processResults: function(item) {return item;}    
        }
    },
    formatSelection: function (item) {
        return item.text;
    },
    formatResult: function (item) {
        return item.text;
    },
    templateResult: function (item) {
        return item.text;
    },
    templateSelection : function (item) {
        return item.text;
    }, 
});


//$(function(){
    /*/local source

    $('#country').editable({
        source: [
              {id: 'gb', text: 'Great Britain'},
              {id: 'us', text: 'United States'},
              {id: 'ru', text: 'Russia'}
           ],
        select2: {
           multiple: true
        }
    });
    //remote source (simple)
    $('#country').editable({
        source: 'http://localhost/celeues/public/estudiante/bus/responsables',
        select2: {
            placeholder: 'Select Country',
            minimumInputLength: 1
        }
    });
    *///remote source (advanced)
    $('#country').editable({
        select2: {
            placeholder: 'Select Country',
            allowClear: true,
            minimumInputLength: 3,
            id: function (item) {
                return item.CountryId;
            },
            ajax: {
                url: 'http://localhost/celeues/public/estudiante/bus/responsables',
                dataType: 'json',
                data: function (term, page) {
                    return { query: term };
                },
                results: function (data, page) {
                    return { results: data };
                }
            },
            formatResult: function (item) {
                return item.CountryName;
            },
            formatSelection: function (item) {
                return item.CountryName;
            },
            initSelection: function (element, callback) {
                return $.get('http://localhost/celeues/public/estudiante/bus/responsables', { query: element.val() }, function (data) {
                    callback(data);
                });
            } 
        }  
    });
//});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#new_status").editable({
  container: "body",
  type: "select2",
  source: [
    { value: "Closed", text: "Closed" },
    { value: "Open", text: "Open" }
  ],
  sourceCache: true,
  emptytext: "No Status for this Ticket",
  placeholder: "Select the Ticket Status",
  select2: {
    allowClear: true,
    placeholder: "Select the Ticket Status"
  },
  title: "Select the Ticket Status",
  success: function(data) {
    console.log("success");
  }
});

$("#new_status").on("shown", function(e, editable) {
  var popover = editable.input.$input[0].closest(".popover");
  var popover_id = popover.id;

  $(document).on("change", editable, function() {
    var new_value = editable.input.$input[0].value;

    if (new_value == "Closed") {
      $("#" + popover_id)
        .find(".help-block")
        .html(
          '<div class="alert alert-warning margin-top-20"><i class="fa fa-warning"></i> Are you sure you want to close this ticket?'
        )
        .show();
    } else {
      $("#" + popover_id)
        .find(".help-block")
        .html("")
        .hide();
    }
  });
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
(function($) {
    var pagify = {
        items: {},
        container: null,
        totalPages: 1,
        perPage: 3,
        currentPage: 0,
        createNavigation: function() {
            this.totalPages = Math.ceil(this.items.length / this.perPage);

            $('.pagination', this.container.parent()).remove();
            var pagination = $('<div class="pagination"></div>').append('<a class="nav prev disabled" data-next="false"><</a>');

            for (var i = 0; i < this.totalPages; i++) {
                var pageElClass = "page";
                if (!i)
                    pageElClass = "page current";
                var pageEl = '<a class="' + pageElClass + '" data-page="' + (
                i + 1) + '">' + (
                i + 1) + "</a>";
                pagination.append(pageEl);
            }
            pagination.append('<a class="nav next" data-next="true">></a>');

            this.container.after(pagination);

            var that = this;
            $("body").off("click", ".nav");
            this.navigator = $("body").on("click", ".nav", function() {
                var el = $(this);
                that.navigate(el.data("next"));
            });

            $("body").off("click", ".page");
            this.pageNavigator = $("body").on("click", ".page", function() {
                var el = $(this);
                that.goToPage(el.data("page"));
            });
        },
        navigate: function(next) {
            // default perPage to 5
            if (isNaN(next) || next === undefined) {
                next = true;
            }
            $(".pagination .nav").removeClass("disabled");
            if (next) {
                this.currentPage++;
                if (this.currentPage > (this.totalPages - 1))
                    this.currentPage = (this.totalPages - 1);
                if (this.currentPage == (this.totalPages - 1))
                    $(".pagination .nav.next").addClass("disabled");
                }
            else {
                this.currentPage--;
                if (this.currentPage < 0)
                    this.currentPage = 0;
                if (this.currentPage == 0)
                    $(".pagination .nav.prev").addClass("disabled");
                }

            this.showItems();
        },
        updateNavigation: function() {

            var pages = $(".pagination .page");
            pages.removeClass("current");
            $('.pagination .page[data-page="' + (
            this.currentPage + 1) + '"]').addClass("current");
        },
        goToPage: function(page) {

            this.currentPage = page - 1;

            $(".pagination .nav").removeClass("disabled");
            if (this.currentPage == (this.totalPages - 1))
                $(".pagination .nav.next").addClass("disabled");

            if (this.currentPage == 0)
                $(".pagination .nav.prev").addClass("disabled");
            this.showItems();
        },
        showItems: function() {
            this.items.hide();
            var base = this.perPage * this.currentPage;
            this.items.slice(base, base + this.perPage).show();

            this.updateNavigation();
        },
        init: function(container, items, perPage) {
            this.container = container;
            this.currentPage = 0;
            this.totalPages = 1;
            this.perPage = perPage;
            this.items = items;
            this.createNavigation();
            this.showItems();
        }
    };

    // stuff it all into a jQuery method!
    $.fn.pagify = function(perPage, itemSelector) {
        var el = $(this);
        var items = $(itemSelector, el);

        // default perPage to 5
        if (isNaN(perPage) || perPage === undefined) {
            perPage = 3;
        }

        // don't fire if fewer items than perPage
        if (items.length <= perPage) {
            return true;
        }

        pagify.init(el, items, perPage);
    };
})(jQuery);

$(".container").pagify(3, ".single-item");

</script>

</html>