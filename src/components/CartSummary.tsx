
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Separator } from "@/components/ui/separator";
import { Badge } from "@/components/ui/badge";
import { CreditCard, Truck, Shield } from "lucide-react";

export const CartSummary = () => {
  const subtotal = 827;
  const shipping = 0;
  const tax = 82.70;
  const total = subtotal + shipping + tax;

  return (
    <div className="space-y-6">
      <Card className="border-0 bg-white/80 backdrop-blur-sm">
        <CardHeader>
          <CardTitle className="text-xl">Order Summary</CardTitle>
        </CardHeader>
        <CardContent className="space-y-4">
          <div className="flex justify-between">
            <span className="text-gray-600">Subtotal</span>
            <span className="font-semibold">${subtotal}</span>
          </div>
          
          <div className="flex justify-between items-center">
            <span className="text-gray-600">Shipping</span>
            <div className="flex items-center space-x-2">
              <Badge variant="outline" className="text-green-600 border-green-200">
                FREE
              </Badge>
              <span className="line-through text-gray-400">${shipping}</span>
            </div>
          </div>
          
          <div className="flex justify-between">
            <span className="text-gray-600">Tax</span>
            <span className="font-semibold">${tax.toFixed(2)}</span>
          </div>
          
          <Separator />
          
          <div className="flex justify-between text-xl font-bold">
            <span>Total</span>
            <span>${total.toFixed(2)}</span>
          </div>
        </CardContent>
      </Card>

      <Card className="border-0 bg-white/80 backdrop-blur-sm">
        <CardContent className="p-6">
          <div className="space-y-4">
            <h3 className="font-semibold text-lg mb-4">Promo Code</h3>
            <div className="flex space-x-2">
              <Input placeholder="Enter code" />
              <Button variant="outline">Apply</Button>
            </div>
          </div>
        </CardContent>
      </Card>

      <Button 
        size="lg" 
        className="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-6 text-lg"
      >
        <CreditCard className="mr-2 h-5 w-5" />
        Proceed to Checkout
      </Button>

      <div className="space-y-3 text-sm text-gray-600">
        <div className="flex items-center space-x-2">
          <Truck className="h-4 w-4 text-green-500" />
          <span>Free shipping on orders over $100</span>
        </div>
        <div className="flex items-center space-x-2">
          <Shield className="h-4 w-4 text-blue-500" />
          <span>Secure checkout with SSL encryption</span>
        </div>
        <div className="flex items-center space-x-2">
          <CreditCard className="h-4 w-4 text-purple-500" />
          <span>30-day money-back guarantee</span>
        </div>
      </div>
    </div>
  );
};
