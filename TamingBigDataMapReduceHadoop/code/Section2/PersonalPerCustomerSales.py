from mrjob.job import MRJob

class MRPerCustomerSales(MRJob):

    def mapper(self, _, line):
        (customerID, orderItem, sales) = line.split(',')
        yield customerID, float(sales)

    def reducer(self, customerID, sales):
        yield customerID, sum( sales )

if __name__ == '__main__':
    MRPerCustomerSales.run()
