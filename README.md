<h1>Sylius plugin - Orders filtration extension</h1>

<p>
    Plugin pro rozšíření filtrace objednávek podle stavu platby a dopravy. Plugin také přidává možnost filtrovat podle nezpracovaných objednávek.
</p>

<p>
    Plugin využíva na filtrování dle stavu platby a dopravy built in select filtr, který je k dispozici v základu.
    Pro filtrování nezpracovaných objednávek přidáva plugin navíc nový filter (Fields value filter), který umožňuje filtrovat v gridu podle specifických hodnot růzých polí.
</p>


Nový filter podporuje tyto expressions: `equals`, `notEquals`, `in`, `notIn`.


## Instalace

- do composer.json přidejte repositář
```json
{
    "repositories": {
        "ExtendedOrdersFiltrationPlugin": {
            "type": "git",
            "url": "https://github.com/PatrikPicka/sylius-plugin-order-filtration.git"
        }
    }
}
```

- stáhněte plugin
```shell
composer require ptb/sylius-extended-order-filter:dev-master
```

- do `config/bundles.php` přidejte
```php
// config/bundles.php
return [
    // ...
    Ptb\ExtendedOrdersFiltrationPlugin\ExtendedOrdersFiltrationPlugin::class => ['all' => true],
```
 
- do `config/_sylius.yaml` přidejte
```yaml
# config/_sylius.yaml

imports:
  # ...
  - { resource: "@ExtendedOrdersFiltrationPlugin/Resources/config/config.yaml" }
```

- obnovte cache aplikace
```shell
php ./bin/console cache:clear
```

- ověřte, že v adminu v objenávkách je filtr rozšířený o checkbox pro filtr neuzavřených objednávek http://localhost/admin/orders/
