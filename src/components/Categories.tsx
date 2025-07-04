
import { Card, CardContent } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Shirt, Watch, Headphones, Smartphone, Car, Home } from "lucide-react";

export const Categories = () => {
  const categories = [
    { name: "Fashion", icon: Shirt, color: "from-pink-500 to-rose-500", count: "120+" },
    { name: "Watches", icon: Watch, color: "from-blue-500 to-indigo-500", count: "85+" },
    { name: "Electronics", icon: Headphones, color: "from-purple-500 to-violet-500", count: "200+" },
    { name: "Mobile", icon: Smartphone, color: "from-green-500 to-emerald-500", count: "150+" },
    { name: "Automotive", icon: Car, color: "from-orange-500 to-red-500", count: "95+" },
    { name: "Home & Garden", icon: Home, color: "from-teal-500 to-cyan-500", count: "180+" },
  ];

  return (
    <section className="py-20 bg-white/50">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="text-4xl font-bold text-gray-900 mb-4">Shop by Category</h2>
          <p className="text-xl text-gray-600 max-w-2xl mx-auto">
            Explore our carefully curated collections designed for your lifestyle
          </p>
        </div>

        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
          {categories.map((category, index) => {
            const IconComponent = category.icon;
            return (
              <Card 
                key={category.name}
                className="group hover:shadow-xl transition-all duration-300 cursor-pointer border-0 bg-white/80 backdrop-blur-sm hover:scale-105"
              >
                <CardContent className="p-6 text-center">
                  <div className={`w-16 h-16 bg-gradient-to-r ${category.color} rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition-transform duration-300`}>
                    <IconComponent className="h-8 w-8 text-white" />
                  </div>
                  <h3 className="font-semibold text-gray-900 mb-1">{category.name}</h3>
                  <p className="text-sm text-gray-500">{category.count} items</p>
                </CardContent>
              </Card>
            );
          })}
        </div>

        <div className="text-center mt-12">
          <Button variant="outline" size="lg" className="px-8">
            View All Categories
          </Button>
        </div>
      </div>
    </section>
  );
};
