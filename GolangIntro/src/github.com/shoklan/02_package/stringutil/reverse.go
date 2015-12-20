// Package stringutil contains utility functions for working with
package stringutil

// Reverse returns its argument string revered rune-wise left to right
func Reverse(s string) string{
	return reverseTwo(s)
}

/*
go build
	go build reverse.go reverseTwo.go
	wont produce an output file.

go install
	will place the package
*/