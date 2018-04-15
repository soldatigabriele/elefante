<script type="text/javascript">
    var tags = [
    @foreach ($tags as $tag)
    {tag: "{{$tag}}" },
    @endforeach
    ];

    var countries = [
    @foreach ($countries as $country)
    {country: "{{$country}}" },
    @endforeach
    ];

    var capacities = [
    @foreach ($capacities as $capacity)
    {capacity: "{{$capacity}}" },
    @endforeach
    ];

    var colours = [
    @foreach ($colours as $colour)
    {colour: "{{$colour}}" },
    @endforeach
    ];

    var flavours = [
    @foreach ($flavours as $flavour)
    {flavour: "{{$flavour}}" },
    @endforeach
    ];

    $('#tags').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'tag',
        labelField: 'tag',
        searchField: 'tag',
        options: tags,
        create: function(input) {
            return {
                tag: input
            }
        }
    });
    $('#flavours').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'flavour',
        labelField: 'flavour',
        searchField: 'flavour',
        maxItems: 1,
        options: flavours,
        create: function(input) {
            return {
                flavour: input
            }
        }
    });
    $('#country').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'country',
        labelField: 'country',
        searchField: 'country',
        maxItems: 1,
        options: countries,
        create: function(input) {
            return {
                country: input
            }
        }
    });
    $('#capacity').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'capacity',
        labelField: 'capacity',
        searchField: 'capacity',
        maxItems: 1,
        options: capacities,
        create: function(input) {
            return {
                capacity: input
            }
        }
    });
    $('#colours').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'colour',
        labelField: 'colour',
        searchField: 'colour',
        options: colours,
        items: ['Yellow', 'Red'],
        create: function(input) {
            return {
                colour: input
            }
        }
    });
</script>
