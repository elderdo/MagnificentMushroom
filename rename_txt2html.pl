#!/usr/local/bin/perl
# rename txt files to html files
use strict;
use warnings;

my @files = <*.txt>;
my $newfile ;

foreach my $file  (@files) {
  $newfile = $file;
# remove the file extension
  $newfile =~ s/\.txt/.html/;
  rename $file, $newfile;
}
