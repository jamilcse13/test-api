<head>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .content {
            text-align: center;
        }
    </style>
</head>

<body>

@if(session()->has('status'))
    <p class="alert alert-success">{{session('status')}}</p>
@endif

<div class="content">
    <div class="col-lg-12">
        <div class="portlet light bordered">
            <h3><span class="caption-subject bold uppercase"> Add New Items </span></h3>
            <div class="portlet-body form">
                <div class="col-md-10 col-md-offset-1">
                    {!! Form::model( $data, ['method' => 'put', 'url' => "dynamic-items", 'files' => true, 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('items', "Item", ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            <div class="item-container" style="margin-top: 1%">

                            </div>
                            <a class="btn btn-success" onclick="addItem('item', '.item-container')">Add Item</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            {!! Form::submit('Update Item', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script>

    let item_count = 0;
    let sub_item_count = 0;

    $(function () {
        let items = JSON.parse('{!! $data ? : "[]" !!}');
        let item = items['name'] ? items['name']  : [];
        let sub_item = items['sub_items'] ? items['sub_items']  : [];

        item.map(function(item){
            addItem('item', '.item-container', item);
        });

        sub_item.map(function(sub_item){
            addSubItem('sub_item', '.sub_item-container', sub_item);
        });

    });

    function addItem(name = "item", selector = ".item-container", item = "")
    {
        $(selector).append(item_template(name, item_count++, item));
    }

    function addSubItem(name = "sub_item", selector = ".sub_item-container", sub_item = "")
    {
        $(selector).append(sub_item_template(name, sub_item_count++, sub_item));
    }

    function item_template (name = "item", index, item = "")
    {
        return `
            <div class="row" id="item_${index}">
                <div class="col-md-10" style="margin-bottom: 1%">
                    <input class="form-control" name="${name}[]" type="text" value="${item}">
                </div>
            </div>`;
    }

    function sub_item_template (name = "sub_item", index, sub_item = "")
    {
        return `
            <div class="row" id="sub_item_${index}">
                <div class="col-md-10" style="margin-bottom: 1%">
                    <input class="form-control" name="${name}[]" type="text" value="${sub_item}">
                </div>
            </div>`;
    }
</script>
</body>
