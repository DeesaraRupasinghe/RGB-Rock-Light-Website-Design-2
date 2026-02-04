import applicationsImage from 'figma:asset/2b9b6b5ab321af4d35c5f8dc31aca5803b5a5690.png';

export function Applications() {
  return (
    <section className="py-12 sm:py-16 md:py-20 bg-gray-900">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-10 sm:mb-12 md:mb-16">
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-3 sm:mb-4 px-4">
            Widely Applicable
          </h2>
          <p className="text-base sm:text-lg md:text-xl text-gray-400 px-4">
            Perfect for vehicles, boats, motorcycles, and outdoor adventures
          </p>
        </div>

        <div className="mb-8 sm:mb-10 md:mb-12">
          <img 
            src={applicationsImage} 
            alt="Wide Applications" 
            className="w-full max-w-5xl mx-auto rounded-xl sm:rounded-2xl shadow-2xl"
          />
        </div>

        <div className="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
          {[
            { icon: '🚙', title: 'Off-Road Vehicles', description: 'Jeeps, trucks, and SUVs' },
            { icon: '⛺', title: 'Camping', description: 'Enhance your outdoor setup' },
            { icon: '⛵', title: 'Marine', description: 'Boats and yachts' },
            { icon: '🏍️', title: 'Motorcycles', description: 'Bikes and ATVs' }
          ].map((app, index) => (
            <div 
              key={index}
              className="bg-gradient-to-br from-white/5 to-white/0 border border-white/10 rounded-lg sm:rounded-xl p-4 sm:p-6 hover:border-cyan-500/40 hover:bg-white/10 transition-all text-center"
            >
              <div className="text-3xl sm:text-4xl mb-2 sm:mb-3">{app.icon}</div>
              <h3 className="text-sm sm:text-base font-bold text-white mb-1 sm:mb-2">{app.title}</h3>
              <p className="text-xs sm:text-sm text-gray-400">{app.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}