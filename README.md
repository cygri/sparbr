# A SPARQL Browser in 19 Lines of PHP

This is an exercise in makin a tiny application that displays the contents of
an RDF store. The application allows navigating through the graph of
connected resources in an RDF store.

## Features

* Navigate along incoming or outgoing triples
* Rudimentary error detection
* Protection against SPARQL injection or XSS attacks
* SPARQL endpoint and starting resource are configurable

## Limitations

* Only allows navigation of the default graph
* Doesn't allow navigation across blank nodes
* Doesn't report error messages from the server 
* Doesn't show datatypes or language tags
* Ordering of properties is not useful (e.g., highlight label/name/title)

## Setup

* Drop into a directory on a PHP-capable webserver
* If you don't want to browse DBpedia, change the endpoint URL and starting resource in lines 1 and 2

## Live examples

* http://lab.linkeddata.deri.ie/2013/sparbr/dbpedia
* http://lab.linkeddata.deri.ie/2013/sparbr/southampton

## Rules

Can you make this smaller or more useful? Fork it and show what you've got!

* Must be PHP (Yes, I know this can be done in half a line of Perl)
* Maximum 80 columns
* Maximize the usefulness-to-lines-of-code ratio

For example, if you can add functionality that adds four lines and makes
the application 27% more useful, you win. If you can remove two lines while
sacrificing only 10% of usefulness, you win.

Usefulness will be determined by a poll of random colleagues of mine  who
happen to be at hand.
