### Apply
#
# I ended up having to be a bit of extra
# research because the lecturer was not as
# descriptive as should have been necessary.
?apply



x = matrix(c(1:9), 3, byrow = T)

# margin :: 1 is for row, 2 is for columns

apply(x, 1, mean)  # gives the mean of every row
apply(x, 2, mean)  # gives the mean of every column

apply(x, 1, plot)  # even graphics functions are possible.

###  TAPPLY
