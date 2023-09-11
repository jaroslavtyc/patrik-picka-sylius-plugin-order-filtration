<h1>Sylius plugin - Orders filtration extension</h1>

<p>
    Plugin pro rozšíření filtrace objednávek podle stavu platby a dopravy. Plugin také přidává možnost filtrovat podle nezpracovaných objednávek.
</p>

<p>
    Plugin využíva na filtrování dle stavu platby a dopravy built in select filtr, který je k dispozici v základu.
    Pro filtrování nezpracovaných objednávek přidáva plugin navíc nový filter (Fields value filter), který umožňuje filtrovat v gridu podle specifických hodnot ruzých polí.
</p>

<p>Pokud že to použijeme v našem případě pro filtraci nezpracovaných objednávek tak by poté filter gridu pro sylius_admin_order vypadal takto:</p>
<code>sylius_grid:
    grids:
        sylius_admin_order:
            filters:
                unprocessed_orders:
                  type: fields_value
                  label: sylius.ui.unprocessed_orders
                  options:
                    fields_filters:
                      payments.state:
                        expression: notEquals
                        value: paid
                      shipments.state:
                        expression: notEquals
                        value: shipped
                      state:
                        expression: notEquals
                        value: fulfilled
    templates:
        filter:
            fields_value: 'Grid/Filter/fields_value.html.twig'

</code>

<p>Nový filter podporuje tyto expressions: 'equals', 'notEquals', 'in', 'notIn'.</p>
<p>Pro instalaci stačí pouze filter zaregistrovat (importovat) jako service do services.yaml a nezapomenout přidat gridům template pro nové filtrovací pole 'fields_value.html.twig'.</p>
