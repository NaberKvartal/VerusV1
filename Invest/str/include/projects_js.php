<script>

    function openCreator() {
            jQuery('#adder').show();
            jQuery('#creatorBut').remove();
    }

    function addProject(){
        var nameAdd, cityAdd, typeAdd, payAdd, timeAdd, a, b, c, d, e, f, g, h, i, j, k, timeStart;
        nameAdd = jQuery('#name').val();
        cityAdd = jQuery('#city').val();
        typeAdd = jQuery('#type').val();
        payAdd = jQuery('#pay').val();
        timeAdd = jQuery('#time_realize').val();
        timeStart = jQuery('#time_start').val();
        a = jQuery('#cost_one_sec').val();
        b = jQuery('#sec_count').val();
        c = jQuery('#full_cost_sec').val();
        d = jQuery('#middle_cost_life').val();
        e = jQuery('#square_life').val();
        f = jQuery('#sum_cost_life').val();
        g = jQuery('#middle_cost_bus').val();
        h = jQuery('#square_bus').val();
        i = jQuery('#sum_cost_bus').val();
        j = jQuery('#full_cost').val();
        k = a*b;
        if(!nameAdd || !nameAdd.length) return false;
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/projects.php',
            data: {action: 'create', name: nameAdd, city: cityAdd, type: typeAdd, pay: payAdd, time_realize: timeAdd, time_start: timeStart,
                cost_one_sec:a, sec_count:b, cost_all_sec: k, full_cost_sec:c, middle_cost_life:d, square_life:e,
                sum_cost_life:f, middle_cost_bus:g, square_bus:h, sum_cost_bus:i, full_cost:j}
        }).done(function(response) {
            window.location.replace('');
        });
    }

    function deleteProject(id){
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/projects.php',
            data: {action: 'delete', id: id}
        }).done(function() {
            window.location.replace('');
        });
    }

    function editStatus(id) {
        var status = jQuery('#statusEdit').val();
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/projects.php',
            data: {action: 'status', id: id, status: status}
        }).done(function() {
            window.location.replace('');
        });
    }
    function addInvest(id){}

    function addRole(id){
        var a1, b1, c1, d1, e1, f1, g1, h1, i1, j1;
        a1 = jQuery('#a1').val();
        b1 = jQuery('#b1').val();
        c1 = jQuery('#c1').val();
        d1 = jQuery('#d1').val();
        e1 = jQuery('#e1').val();
        f1 = jQuery('#f1').val();
        g1 = jQuery('#g1').val();
        h1 = jQuery('#h1').val();
        i1 = jQuery('#i1').val();
        j1 = jQuery('#j1').val();
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/projects.php',
            data: {action: 'role',
                id_project: id,
                a: a1,
                b: b1,
                c: c1,
                d: d1,
                e: e1,
                f: f1,
                g: g1,
                h: h1,
                i: i1,
                j: j1
            }
        }).done(function() {
            window.location.replace('/projects/?id='+id);
        });
    }
    function editRole(id){
        var a1, b1, c1, d1, e1, f1, g1, h1, i1, j1;
        a1 = jQuery('#a1').val();
        b1 = jQuery('#b1').val();
        c1 = jQuery('#c1').val();
        d1 = jQuery('#d1').val();
        e1 = jQuery('#e1').val();
        f1 = jQuery('#f1').val();
        g1 = jQuery('#g1').val();
        h1 = jQuery('#h1').val();
        i1 = jQuery('#i1').val();
        j1 = jQuery('#j1').val();
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/projects.php',
            data: {action: 'editrole',
                id_project: id,
                a: a1,
                b: b1,
                c: c1,
                d: d1,
                e: e1,
                f: f1,
                g: g1,
                h: h1,
                i: i1,
                j: j1
            }
        }).done(function() {
            window.location.replace('/projects/?id='+id);
        });
    }
    function editProject(id){
        var a1, b1, c1, d1, e1, f1, g1, h1, i1, j1, k, l, m, n, o, p, r;
        a1 = jQuery('#a1').val();
        b1 = jQuery('#b1').val();
        c1 = jQuery('#c1').val();
        d1 = jQuery('#d1').val();
        e1 = jQuery('#e1').val();
        f1 = jQuery('#f1').val();
        g1 = jQuery('#g1').val();
        h1 = jQuery('#h1').val();
        i1 = jQuery('#i1').val();
        j1 = jQuery('#j1').val();
        k = jQuery('#k1').val();
        l = jQuery('#l1').val();
        m = jQuery('#m1').val();
        n = jQuery('#n1').val();
        o = jQuery('#o1').val();
        p = jQuery('#p1').val();
        r = jQuery('#r1').val();
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/projects.php',
            data: {action: 'editproject',
                id_project: id,
                a: a1,
                b: b1,
                c: c1,
                d: d1,
                e: e1,
                f: f1,
                g: g1,
                h: h1,
                i: i1,
                j: j1,
                k: k,
                l: l,
                m: m,
                n: n,
                o: o,
                p: p,
                r: r
            }
        }).done(function() {
            window.location.replace('/projects/?id='+id);
        });
    }
</script>