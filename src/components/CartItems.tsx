
import { Card, CardContent } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Trash2, Plus, Minus } from "lucide-react";
import { useState } from "react";

export const CartItems = () => {
  const [cartItems, setCartItems] = useState([
    {
      id: 1,
      name: "Premium Wireless Headphones",
      price: 299,
      quantity: 1,
      image: "bg-gradient-to-br from-slate-200 to-slate-300"
    },
    {
      id: 2,
      name: "Smart Fitness Watch",
      price: 249,
      quantity: 2,
      image: "bg-gradient-to-br from-blue-200 to-blue-300"
    },
    {
      id: 3,
      name: "Designer Leather Wallet",
      price: 79,
      quantity: 1,
      image: "bg-gradient-to-br from-amber-200 to-amber-300"
    }
  ]);

  const updateQuantity = (id: number, newQuantity: number) => {
    if (newQuantity < 1) return;
    setCartItems(prev => 
      prev.map(item => 
        item.id === id ? { ...item, quantity: newQuantity } : item
      )
    );
  };

  const removeItem = (id: number) => {
    setCartItems(prev => prev.filter(item => item.id !== id));
  };

  return (
    <div className="space-y-4">
      <h2 className="text-2xl font-bold text-gray-900 mb-6">Your Items</h2>
      
      {cartItems.map((item) => (
        <Card key={item.id} className="border-0 bg-white/80 backdrop-blur-sm">
          <CardContent className="p-6">
            <div className="flex items-center space-x-4">
              <div className={`w-20 h-20 ${item.image} rounded-lg flex-shrink-0`}></div>
              
              <div className="flex-1">
                <h3 className="font-semibold text-lg text-gray-900 mb-2">
                  {item.name}
                </h3>
                <p className="text-2xl font-bold text-gray-900">
                  ${item.price}
                </p>
              </div>

              <div className="flex items-center space-x-2">
                <Button
                  variant="outline"
                  size="sm"
                  onClick={() => updateQuantity(item.id, item.quantity - 1)}
                  disabled={item.quantity <= 1}
                >
                  <Minus className="h-4 w-4" />
                </Button>
                <Input
                  type="number"
                  value={item.quantity}
                  onChange={(e) => updateQuantity(item.id, parseInt(e.target.value) || 1)}
                  className="w-16 text-center"
                  min="1"
                />
                <Button
                  variant="outline"
                  size="sm"
                  onClick={() => updateQuantity(item.id, item.quantity + 1)}
                >
                  <Plus className="h-4 w-4" />
                </Button>
              </div>

              <div className="text-right">
                <p className="text-xl font-bold text-gray-900 mb-2">
                  ${item.price * item.quantity}
                </p>
                <Button
                  variant="ghost"
                  size="sm"
                  className="text-red-500 hover:text-red-700 hover:bg-red-50"
                  onClick={() => removeItem(item.id)}
                >
                  <Trash2 className="h-4 w-4" />
                </Button>
              </div>
            </div>
          </CardContent>
        </Card>
      ))}

      {cartItems.length === 0 && (
        <Card className="border-0 bg-white/80 backdrop-blur-sm">
          <CardContent className="p-12 text-center">
            <p className="text-gray-500 text-lg">Your cart is empty</p>
            <Button className="mt-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
              Continue Shopping
            </Button>
          </CardContent>
        </Card>
      )}
    </div>
  );
};
