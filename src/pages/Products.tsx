
import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { ProductGrid } from "@/components/ProductGrid";
import { ProductFilter } from "@/components/ProductFilter";
import { useState } from "react";

const Products = () => {
  const [selectedCategory, setSelectedCategory] = useState("all");
  const [sortBy, setSortBy] = useState("name");

  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
      <Header />
      <div className="container mx-auto px-4 py-8">
        <div className="flex flex-col lg:flex-row gap-8">
          <aside className="lg:w-1/4">
            <ProductFilter 
              selectedCategory={selectedCategory}
              setSelectedCategory={setSelectedCategory}
              sortBy={sortBy}
              setSortBy={setSortBy}
            />
          </aside>
          <main className="lg:w-3/4">
            <ProductGrid 
              selectedCategory={selectedCategory}
              sortBy={sortBy}
            />
          </main>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default Products;
